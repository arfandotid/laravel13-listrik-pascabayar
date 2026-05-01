import { Head, Link, usePage } from "@inertiajs/react";
import LayoutApp from "@/Layouts/LayoutApp";
import { CreditCard, File } from "lucide-react";
import PageHeader from "@/Shared/PageHeader";
import TableEmpty from "@/Shared/TableEmpty";
import Search from "@/Shared/Search";
import TablePagination from "@/Shared/TablePagination";
import { Button } from "@/Components/ui/button";
import {
    Table,
    TableHeader,
    TableRow,
    TableHead,
    TableBody,
    TableCell,
} from "@/Components/BasicTable";
import { NAMA_BULAN } from "@/constants/nama-bulan";
import DialogEdit from "./_components/DialogEdit";
import { formatUang } from "@/lib/format-uang";
import { BadgeTagihan } from "@/Shared/BadgeTagihan";

export default function TagihansIndex() {
    const { tagihan } = usePage().props;

    return (
        <>
            <Head title={"Tagihan"} />
            <LayoutApp>
                <PageHeader title="Tagihan" description="Bayar tagihan" />

                <div className="space-y-5">
                    <Search URL={"/tagihan"} />

                    <Table>
                        <TableHeader>
                            <TableRow>
                                <TableHead>No.</TableHead>
                                <TableHead>Pelanggan</TableHead>
                                <TableHead>Bulan</TableHead>
                                <TableHead>Tahun</TableHead>
                                <TableHead>Jumlah meter</TableHead>
                                <TableHead>Jumlah biaya</TableHead>
                                <TableHead>Status</TableHead>
                                <TableHead className="w-7">
                                    Upload Bukti
                                </TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            {tagihan && tagihan.data.length > 0 ? (
                                tagihan.data.map((item, index) => (
                                    <TableRow key={item.id}>
                                        <TableCell className="font-medium">
                                            {++index +
                                                (tagihan.current_page - 1) *
                                                    tagihan.per_page}
                                        </TableCell>
                                        <TableCell>
                                            {item.pelanggan?.nama || "N/A"}
                                        </TableCell>
                                        <TableCell>
                                            {NAMA_BULAN[item.bulan]}
                                        </TableCell>
                                        <TableCell>{item.tahun}</TableCell>
                                        <TableCell>
                                            {item.jumlah_meter}
                                        </TableCell>
                                        <TableCell>
                                            {formatUang(item.jumlah_biaya)}
                                        </TableCell>
                                        <TableCell>
                                            {BadgeTagihan[item.status]}
                                        </TableCell>
                                        <TableCell>
                                            {item.status == "unpaid" && (
                                                <div className="flex items-center space-x-2">
                                                    <DialogEdit id={item.id} />
                                                </div>
                                            )}
                                        </TableCell>
                                    </TableRow>
                                ))
                            ) : (
                                <TableEmpty
                                    title="Tidak ada data"
                                    description="Silahkan tambahkan data baru"
                                    colSpan={8}
                                />
                            )}
                        </TableBody>
                    </Table>

                    <TablePagination links={tagihan.links} />
                </div>
            </LayoutApp>
        </>
    );
}
