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

export default function PenggunaansIndex() {
    const { penggunaan } = usePage().props;

    return (
        <>
            <Head title={"Penggunaan"} />
            <LayoutApp>
                <PageHeader
                    showButton
                    title="Penggunaan"
                    description="Kelola data penggunaan"
                    action="/admin/penggunaan/create"
                    actionText="Tambah Penggunaan"
                    permission="penggunaan.create"
                />

                <div className="space-y-5">
                    <Search URL={"/admin/penggunaan"} />

                    <Table>
                        <TableHeader>
                            <TableRow>
                                <TableHead>No.</TableHead>
                                <TableHead>Pelanggan id</TableHead>
                                <TableHead>Bulan</TableHead>
                                <TableHead>Tahun</TableHead>
                                <TableHead>Meter awal</TableHead>
                                <TableHead>Meter akhir</TableHead>
                                <TableHead className="w-7">Aksi</TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            {penggunaan && penggunaan.data.length > 0 ? (
                                penggunaan.data.map((item, index) => (
                                    <TableRow key={item.id}>
                                        <TableCell className="font-medium">
                                            {++index +
                                                (penggunaan.current_page - 1) *
                                                    penggunaan.per_page}
                                        </TableCell>
                                        <TableCell>
                                            {item.pelanggan_id}
                                        </TableCell>
                                        <TableCell>{item.bulan}</TableCell>
                                        <TableCell>{item.tahun}</TableCell>
                                        <TableCell>{item.meter_awal}</TableCell>
                                        <TableCell>
                                            {item.meter_akhir}
                                        </TableCell>
                                        <TableCell>
                                            <div className="flex items-center space-x-2">
                                                {hasAnyPermission([
                                                    "penggunaan.edit",
                                                ]) && (
                                                    <Link
                                                        href={`/admin/penggunaan/${item.id}/edit`}
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
                                                    "penggunaan.delete",
                                                ]) && (
                                                    <Delete
                                                        URL={
                                                            "/admin/penggunaan"
                                                        }
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
                                    colSpan={7}
                                />
                            )}
                        </TableBody>
                    </Table>

                    <TablePagination links={penggunaan.links} />
                </div>
            </LayoutApp>
        </>
    );
}
