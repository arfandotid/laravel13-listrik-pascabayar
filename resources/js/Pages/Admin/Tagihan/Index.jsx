import { Head, Link, usePage } from "@inertiajs/react";
import LayoutApp from "@/Layouts/LayoutApp";
import hasAnyPermission from "@/Utils/Permission";
import { Edit } from "lucide-react";
import PageHeader from "@/Shared/PageHeader";
import TableEmpty from "@/Shared/TableEmpty";
import Search from "@/Shared/Search";
import Delete from "@/Shared/Delete";
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

export default function TagihansIndex() {
    const { tagihan } = usePage().props;

    return (
        <>
            <Head title={"Tagihan"} />
            <LayoutApp>
                <PageHeader
                    showButton
                    title="Tagihan"
                    description="Kelola data tagihan"
                    action="/admin/tagihan/create"
                    actionText="Tambah Tagihan"
                    permission="tagihan.create"
                />

                <div className="space-y-5">
                    <Search URL={"/admin/tagihan"} />

                    <Table>
                        <TableHeader>
                            <TableRow>
                                <TableHead>No.</TableHead>
                                <TableHead>Penggunaan id</TableHead>
                                <TableHead>Pelanggan id</TableHead>
                                <TableHead>Bulan</TableHead>
                                <TableHead>Tahun</TableHead>
                                <TableHead>Jumlah meter</TableHead>
                                <TableHead>Status</TableHead>
                                <TableHead className="w-7">Aksi</TableHead>
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
                                            {item.penggunaan_id}
                                        </TableCell>
                                        <TableCell>
                                            {item.pelanggan_id}
                                        </TableCell>
                                        <TableCell>{item.bulan}</TableCell>
                                        <TableCell>{item.tahun}</TableCell>
                                        <TableCell>
                                            {item.jumlah_meter}
                                        </TableCell>
                                        <TableCell>{item.status}</TableCell>
                                        <TableCell>
                                            <div className="flex items-center space-x-2">
                                                {hasAnyPermission([
                                                    "tagihan.edit",
                                                ]) && (
                                                    <Link
                                                        href={`/admin/tagihans/${item.id}/edit`}
                                                        title="Edit"
                                                    >
                                                        <Button
                                                            size="icon"
                                                            variant="outline"
                                                        >
                                                            <Edit />
                                                        </Button>
                                                    </Link>
                                                )}
                                                {hasAnyPermission([
                                                    "tagihan.delete",
                                                ]) && (
                                                    <Delete
                                                        URL={"/admin/tagihan"}
                                                        id={item.id}
                                                    />
                                                )}
                                            </div>
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
