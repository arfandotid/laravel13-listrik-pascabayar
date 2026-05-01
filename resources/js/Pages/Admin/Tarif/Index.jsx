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

export default function TarifsIndex() {
    const { tarif } = usePage().props;

    return (
        <>
            <Head title={"Tarif"} />
            <LayoutApp>
                <PageHeader
                    showButton
                    title="Tarif"
                    description="Kelola data tarif"
                    action="/admin/tarif/create"
                    actionText="Tambah Tarif"
                    permission="tarif.create"
                />

                <div className="space-y-5">
                    <Search URL={"/admin/tarif"} />

                    <Table>
                        <TableHeader>
                            <TableRow>
                                <TableHead>No.</TableHead>
                                <TableHead>Daya</TableHead>
                                <TableHead>Tarif Per Kwh</TableHead>
                                <TableHead className="w-7">Aksi</TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            {tarif && tarif.data.length > 0 ? (
                                tarif.data.map((item, index) => (
                                    <TableRow key={item.id}>
                                        <TableCell className="font-medium">
                                            {++index +
                                                (tarif.current_page - 1) *
                                                    tarif.per_page}
                                        </TableCell>
                                        <TableCell>{item.daya}</TableCell>
                                        <TableCell>
                                            {item.tarifperkwh}
                                        </TableCell>
                                        <TableCell>
                                            <div className="flex items-center space-x-2">
                                                {hasAnyPermission([
                                                    "tarif.edit",
                                                ]) && (
                                                    <Link
                                                        href={`/admin/tarif/${item.id}/edit`}
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
                                                    "tarif.delete",
                                                ]) && (
                                                    <Delete
                                                        URL={"/admin/tarif"}
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
                                    colSpan={4}
                                />
                            )}
                        </TableBody>
                    </Table>

                    <TablePagination links={tarif.links} />
                </div>
            </LayoutApp>
        </>
    );
}
